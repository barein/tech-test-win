import { Injectable } from '@angular/core';
import { MusicBand } from "./music-band";
import { MusicBandApiGateway } from "./music-band-api-gateway";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class MusicBandRepository {
  private musicBands: Array<MusicBand> = [];

  constructor(
    private musicBandApiGateway: MusicBandApiGateway
  ) {
  }

  public getList(): Array<MusicBand> {
    this.musicBands = [];

    let getMusicBandsResponse = this.musicBandApiGateway.getMusicBands();

    getMusicBandsResponse.forEach((musicBands: MusicBand[]) => {
      for (let musicBand of musicBands) {
        this.musicBands.push(new MusicBand(
          musicBand.id,
          musicBand.name,
          musicBand.description,
          musicBand.originCountry,
          musicBand.originCity,
          musicBand.startingYear,
          musicBand.bandSplitYear,
          musicBand.founders,
          musicBand.membersCount,
          musicBand.musicalMovement,
        ));
      }
    });

    return this.musicBands;
  }

  delete(id: string): Observable<any> {
    return this.musicBandApiGateway.delete(id);
  }
}
