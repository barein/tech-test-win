import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ListMusicBandsComponent } from "./music-band/list-music-bands/list-music-bands.component";

const routes: Routes = [
  { path: '', component: ListMusicBandsComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
