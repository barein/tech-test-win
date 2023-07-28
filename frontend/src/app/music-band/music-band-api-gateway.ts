import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MusicBand } from "./music-band";
import { Observable } from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class MusicBandApiGateway {

  constructor(
    private http: HttpClient
  ) {}

  public getMusicBands(): Observable<MusicBand[]> {
    return this.http.get<MusicBand[]>('http://localhost:80/music-bands', {
      observe: 'body',
      responseType: 'json',
    });
  }

  delete(id: string): Observable<any> {
    return this.http.delete(`http://localhost:80/music-bands/${id}`);
  }

  getMusicBand(musicBandId: string): Observable<MusicBand> {
    return this.http.get<MusicBand>(`http://localhost:80/music-bands/${musicBandId}`, {
      observe: 'body',
      responseType: 'json',
    });
  }
}
