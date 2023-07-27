import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListMusicBandsComponent } from './list-music-bands.component';

describe('ListMusicBandsComponent', () => {
  let component: ListMusicBandsComponent;
  let fixture: ComponentFixture<ListMusicBandsComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ListMusicBandsComponent]
    });
    fixture = TestBed.createComponent(ListMusicBandsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
