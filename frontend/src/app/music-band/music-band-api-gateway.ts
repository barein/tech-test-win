import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {MusicBand} from "./music-band";

@Injectable({
  providedIn: 'root'
})
export class MusicBandApiGateway {

  constructor(
    private http: HttpClient
  ) {}

  public getMusicBands() {
    return this.http.get<MusicBand[]>('http://localhost:80/music-bands', {
      observe: 'body',
      responseType: 'json',
    });
  }
}
