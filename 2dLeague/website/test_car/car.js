function Octane(x,y,r) {
  this.pos = createVector(x, y);
  this.r = r;
  this.vel = createVector(0,0);


  this.update = function() {
    var newvel = createVector(mouseX-width/2, mouseY-height/2);
    newvel.setMag(3);
    this.vel.lerp(newvel, 0.2);
    this.pos.add(this.vel);

    if (this.pos.x < 0) {
      this.pos.x = this.pos.x * -1 ;
    }

    if (this.pos.y < 0) {
      this.pos.y = this.pos.y * -1;
    }
    //define upper bounds for x and y. do this and basic physics are done for ball too. just defining touch and imapct is left.
    if (this.pos.x + 100 > width) {
      this.pos.x = width - 100;

    }

    if (this.pos.y + 100 > height) {                            //1210  =  1210 -2*1210%1200 ==1210 - 20 == 1190
      this.pos.y = height - 100;
    
    }
    //var carVel = createVector(this.vel);
  }

  this.show = function() {
      fill(255,100,100);
      rect(this.pos.x, this.pos.y, this.r*2, this.r*2);
  }

}