function Paddle(x,y,r) {
  var paddleWidth = 25;
  var paddleHeight = 100;
    this.pos = createVector(x,y);
    this.r = r;
    this.vel = createVector(0,0);

    this.update = function() {
        if (this.pos.x < 0) {
            this.pos.x = this.pos.x * -1 ;
          }
      
        if (this.pos.y < 0) {
            this.pos.y = this.pos.y * -1;
          }
          //define upper bounds for x and y. do this and basic physics are done for ball too. just defining touch and imapct is left.
        if (this.pos.x +100 > width) {
            this.pos.x = width - 100;
      
          }
      
        if (this.pos.y + 100 > height) {                            //1210  =  1210 -2*1210%1200 ==1210 - 20 == 1190
            this.pos.y = height - 100;
          
          }



    }

    

      //movement. need to make it press once for one time
      this.moveP0 = function () {
      keyPressed();
      keyTyped();
      function keyPressed() {
        //var p0_y = paddie0.pos.y;
        if (keyCode === UP_ARROW ) {
          paddie1.pos.y -= 5;
        } else if (keyCode === DOWN_ARROW) {
          paddie1.pos.y += 5;
        }
      }

      function keyTyped() {
        //var p1_y = paddie1.pos.y;
        if (key === 'w') {
          paddie0.pos.y -= 5;
        } else if (key === 's') {
          paddie0.pos.y += 5;
        }
      }
      }
      



    this.show = function () {
        rect(this.pos.x, this.pos.y, paddleWidth, paddleHeight);
    }

    this.colour = function (a,b,c) {
      fill(a,b,c);
    }

    
}