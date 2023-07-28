import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ListMusicBandsComponent } from "./music-band/list-music-bands/list-music-bands.component";
import {ViewMusicBandComponent} from "./music-band/view-music-band/view-music-band.component";

const routes: Routes = [
  { path: '', component: ListMusicBandsComponent },
  { path: 'music-bands/:musicBandId', component: ViewMusicBandComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
