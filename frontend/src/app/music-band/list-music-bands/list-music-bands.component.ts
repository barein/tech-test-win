import { Component, OnInit } from '@angular/core';
import { MusicBand } from "../music-band";
import { MusicBandRepository } from "../music-band-repository";

@Component({
  selector: 'app-list-music-bands',
  templateUrl: './list-music-bands.component.html',
  styleUrls: ['./list-music-bands.component.css']
})
export class ListMusicBandsComponent implements OnInit {
  musicBands: Array<MusicBand> = [];

  constructor(
    private musicBandRepository: MusicBandRepository
  ) {
  }

  ngOnInit(): void {
    this.getMusicBands();
  }

  private getMusicBands(): void {
    this.musicBands = this.musicBandRepository.getList();
  }

  public deleteMusicBand(id: string): void {
    this.musicBandRepository.delete(id).subscribe(() => {
      let musicBandIndexToDelete = undefined;
      this.musicBands.forEach(function (value, index) {
        if (value.id === id) {
          musicBandIndexToDelete = index;
        }
      });

      if(musicBandIndexToDelete !== undefined) {
        this.musicBands.splice(musicBandIndexToDelete, 1);
      }
    });
  }
}
