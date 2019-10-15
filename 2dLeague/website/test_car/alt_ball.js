// function Ball () {
//     ball_x = 600;
//     ball_y = 300;
//     var ball_w = 50;
//     var ball_h = 50;
//     var dir_x = 1;
//     var dir_y = -1;
//     var ballspeed = 1;

    
//     this.update = function () {
//         ball_x = ball_x + (dir_x*ballspeed);
//         ball_y = ball_y + (dir_y*ballspeed);

//         if (ball_x < 0) {
//             dir_x = dir_x *   -1;
//         }
//         if (ball_y < 0) {
//             dir_y = dir_y * -1;
//         }
//         if (ball_x > width) {
//             dir_x = dir_x * -1;
//         }
//         if (ball_y > height) {
//             dir_y = dir_y * -1;
//         }
//     }

//     this.show = function () {
//         fill(255);
//         ellipse(ball_x, ball_y, ball_w, ball_h);
//     }
//         //create a range for dist b/w ball and car. range is: max=diag of car and rad of ball;
//         //min=halfwidth/halfheight of car and radius of ball; hope fully it can run through obj file.
//         //if required do it in sketch.js
//     this.comp_dist = function () {
//     }
// }

function Ball(x,y,r) {
    this.pos = createVector(x,y);
    this.r = r;
    this.vel = createVector(0,0);
    this.newVel = createVector(0,0);



    this.update = function () {
        if (this.pos != 0){
            newVel.setMag(oct.update.carVel);
        }
        if (this.pos.x < 0) {
            this.pos.x = this.pos.x + (balldirectionx * ballspeed);
          }
      
          if (this.pos.y < 0) {
            this.pos.y = this.pos.y * -1;
          }
          //define upper bounds for x and y. do this and basic physics are done for ball too. just defining touch and imapct is left.
          if (this.pos.x + 60 > width) {
            this.pos.x = width - 60;
      
          }
      
          if (this.pos.y + 60 > height) {                            //1210  =  1210 -2*1210%1200 ==1210 - 20 == 1190
            this.pos.y = height - 60;
          
          }
        


    }
    this.show = function() {
        fill(255);
        ellipse(this.pos.x, this.pos.y, this.r*2, this.r*2);
        //this is HOW YOU SHARE VARIABLES YOU BITCH
        console.log(oct.pos.x)
    }

}