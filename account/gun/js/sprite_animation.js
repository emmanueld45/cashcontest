class SpriteAnimation {
  img;
  frames;
  start_position;
  end_position;
  ctx;
  canvas;

  constructor(img, frames, start_position, end_position, canvas, ctx) {
    this.img = img;
    this.frames = frames;
    this.start_position = start_position;
    this.end_position = end_position;
    this.ctx = ctx;
    this.canvas = canvas;
  }

  animate(x, y, width, height) {
    if (this.start_position >= this.end_position) {
      this.start_position = 0;
    } else {
      this.start_position++;
      this.ctx.drawImage(
        this.img,
        (this.img.width / this.frames) * this.start_position,
        0,
        this.img.width / this.frames,
        this.img.height,
        x,
        y,
        width,
        height
      );
    }
  }
}
