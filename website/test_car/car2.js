function Octane2(x,y,r) {
    this.pos = createVector(x, y);
    this.r = r;
    this.vel = createVector(0,0);
  
    this.update = function() {
      var newvel = createVector(mouseX-width/2, mouseY-height/2);
      newvel.setMag(3);
      this.vel.lerp(newvel, 0.2);
      this.pos.add(this.vel);
    }
  
    this.show = function() {
        fill(100,255,100);
        rect(this.pos.x, this.pos.y, this.r*2, this.r*2);
    }
  
  }