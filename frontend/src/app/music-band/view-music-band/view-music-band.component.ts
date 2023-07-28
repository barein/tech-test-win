import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { MusicBandRepository } from "../music-band-repository";
import {MusicBand} from "../music-band";

@Component({
  selector: 'app-view-music-band',
  templateUrl: './view-music-band.component.html',
  styleUrls: ['./view-music-band.component.css']
})
export class ViewMusicBandComponent implements OnInit {

  public musicBand: MusicBand|undefined;

  constructor(
    private musicBandRepository: MusicBandRepository,
    private route: ActivatedRoute,
  ) {
  }

  ngOnInit() {
    const routeParams = this.route.snapshot.paramMap;
    const musicBandId = String(routeParams.get('musicBandId'));

    this.musicBand = this.musicBandRepository.get(musicBandId);
  }
}
