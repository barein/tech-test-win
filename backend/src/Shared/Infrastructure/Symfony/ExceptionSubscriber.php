<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Symfony;

use App\Shared\Domain\AbstractDomainException;
use App\Shared\Domain\HttpStatusCode;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Messenger\Exception\HandlerFailedException;

final class ExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @return array<string, string>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onException',
        ];
    }

    public function onException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof HandlerFailedException) {
            /** @var \Throwable $exception */
            $exception = $exception->getPrevious();
        }

        $event->setResponse(
            new JsonResponse(
                [
                    'code' => $this->exceptionCodeFor($exception),
                    'message' => $exception->getMessage(),
                ],
                $this->statusCodeFor($exception)
            )
        );
    }

    private function exceptionCodeFor(\Throwable $exception): string
    {
        if ($exception instanceof AbstractDomainException) {
            return $exception->errorCode();
        }

        return $this->toSnakeCase($this->extractClassName($exception));
    }

    private function statusCodeFor(\Throwable $exception): int
    {
        if ($exception instanceof AbstractDomainException) {
            return $exception->httpStatusCode()->value;
        }

        if ($exception instanceof HttpExceptionInterface) {
            return $exception->getStatusCode();
        }

        return HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR->value;
    }

    private function toSnakeCase(string $text): string
    {
        return ctype_lower($text) ? $text : strtolower((string) preg_replace('/([^A-Z\s])([A-Z])/', '$1_$2', $text));
    }

    private function extractClassName(object $object): string
    {
        $reflect = new \ReflectionClass($object);

        return $reflect->getShortName();
    }
}
