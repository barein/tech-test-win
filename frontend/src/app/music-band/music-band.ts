export class MusicBand {
  constructor(
    public id: string,
    public name: string,
    public description: string,
    public originCountry: string,
    public originCity: string,
    public startingYear: number,
    public bandSplitYear?: number,
    public founders?: string,
    public membersCount?: number,
    public musicalMovement?: string,
  ) {
  }
}
