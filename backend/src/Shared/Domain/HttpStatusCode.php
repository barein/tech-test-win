<?php

declare(strict_types=1);

namespace App\Shared\Domain;

enum HttpStatusCode: int
{
    case OK = 200;
    case HTTP_CREATED = 201;
    case HTTP_ACCEPTED = 202;
    case HTTP_PERMANENTLY_REDIRECT = 308;
    case HTTP_BAD_REQUEST = 400;
    case HTTP_UNAUTHORIZED = 401;
    case HTTP_FORBIDDEN = 403;
    case HTTP_NOT_FOUND = 404;
    case UNPROCESSABLE_ENTITY = 422;
    case HTTP_INTERNAL_SERVER_ERROR = 500;
}
