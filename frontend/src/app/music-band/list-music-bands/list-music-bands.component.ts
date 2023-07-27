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
    this.musicBands = this.musicBandRepository.getList();
  }
}
