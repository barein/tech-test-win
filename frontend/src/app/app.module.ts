import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ListMusicBandsComponent } from './music-band/list-music-bands/list-music-bands.component';
import { HttpClientModule } from "@angular/common/http";
import { ViewMusicBandComponent } from './music-band/view-music-band/view-music-band.component';

@NgModule({
  declarations: [
    AppComponent,
    ListMusicBandsComponent,
    ViewMusicBandComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
