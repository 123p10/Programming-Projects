#include "main.h"
#include "fbc.h"
#include "fbc_pid.h"

/*
 OK for all declarations of motors USE THESE FUNCTIONS
 This is because motors cannot be reversed using pros so we must set them to negative in these functions
*/

void setLift(int speed){
  motorSet(LiftL,-speed);
  motorSet(LiftR,speed);
}
void setLDrive(int speed){
  motorSet(LDF, -speed);
  motorSet(LDB, -speed);

}
void setRDrive(int speed){
  motorSet(RDF, speed);
  motorSet(RDB, speed);

}
void setFlyWheel(int speed){
  motorSet(FWheelL, -speed);
  motorSet(FWheelR, -speed);

}
void setIndexor(int speed){
  motorSet(Indexor,-speed);
}
void setDrive(int left,int right){
  setLDrive(left);
  setRDrive(right);
}
void setFlipper(int speed){
  motorSet(flipper,speed);
}
/*void slowDownFlywheel(){
  int timeDelay = 250;
  unsigned long time = millis();
  while(abs(motorGet(FWheelB)) >= 10){
    if(millis() - time >= (unsigned long)timeDelay){
      setFlyWheel(abs(motorGet(FWheelB)) - 10);
      time = millis();
    }
  }
}*/

/*
void flywheelRPMCode(int rpm){
  int kP = 5;
  int lastTime = currTime;
  int deltaTime, deltaMeasurement,deltaRPM;
  int lastMeasurement = encoderGet(QUAD_FLYWHEEL);
  delay(200);
  while(true){
    deltaTime = millis() - lastTime;
    //if you doing in a task like you gotta deal with this another way
    deltaMeasurement = encoderGet(yourFlywheel) - lastMeasurement;
    //multiply by 5 since we do this every 5th of a second multiply by 60 for 60 seconds in a minute
    deltaRPM = (deltaMeasurement/deltaTime)*5*60;
    setFlyWheelSpeed(deltaRPM / kP);
    lastMeasurement = encoderGet(QUAD_FLYWHEEL);
    lastTime = millis();
    delay(200);
  }
}
*/


/*
Joystick Axis
1 = Right Stick Horizontal
2 = Right Stick Vertical
3 = Left Stick Vertical
4 = Left Stick Horizontal
*/
int joystick(int axis){
  return joystickGetAnalog (1,axis);
}



int button(int btnGroup, char dir){
  if(dir == 'L') dir = JOY_LEFT;
  if(dir == 'R') dir = JOY_RIGHT;
  if(dir == 'U') dir = JOY_UP;
  if(dir == 'D') dir = JOY_DOWN;
  //IF YOU PUT LEFT OR RIGHT FOR 5 or 6
  //Will return undefined
  return joystickGetDigital(1, btnGroup, dir);
}



//Auton functions
int inchesToTicks(int inches){
  return (360 / (4 * 3.14159)) * inches;
}
int cmToTicks(int cm){
  return (360/(10.16*3.14159)) * cm;
}
//my PID
void driveForward(int distance, double kP){
  int start = millis();
  encoderReset(driveL);
  encoderReset(driveR);
  int dL = distance - encoderGet(driveL);
  int dR = distance - encoderGet(driveR);
  int output = dL - dR;
  setLDrive(80);
  setRDrive(80-5);
  while(dL >= 0){
    dL = distance - encoderGet(driveL);
    dR = distance - encoderGet(driveR);
    output = (encoderGet(driveL) - encoderGet(driveR)) * kP;
    setLDrive(80);
    setRDrive(motorGet(RDF) + output);
    if(millis() - start >= 3000){
      break;
    }

    delay(100);
  }
  setDrive(-20, -20);
  delay(200);
  setDrive(0, 0);
}
void driveBackward(int distance,int breakout,double kP){
  int start = millis();
  //const double kP = 0.5;
  const double kD = 0.05;
  int previous_error = 0;
  encoderReset(driveL);
  encoderReset(driveR);
  int dL = distance + encoderGet(driveL);
  int dR = distance + encoderGet(driveR);
  int output = dL - dR;
  setLDrive(-80);
  setRDrive(-80);
  while(dL >= 0){
    dL = distance + encoderGet(driveL);
    dR = distance + encoderGet(driveR);

    output = (encoderGet(driveL) - encoderGet(driveR)) * kP + (dL - dR - previous_error) * kD;
    previous_error = dL - dR;
    setLDrive(-80);
    setRDrive(motorGet(RDF) + output);
    if(millis() - start >= breakout){
      break;
    }
    delay(100);
  }
  setDrive(20, 20);
  delay(200);
  setDrive(0, 0);
}

void flyWheelSpeed(int desiredRPM){

}
void turnGyro(int angle){

}
//17 cmToTicks is like 90 degrees
//20 cmToTicks is like 135 degrees
void turnEncoder(int dist){
  encoderReset(driveL);
  encoderReset(driveR);
  int turningSpeed = 80;
  setLDrive(turningSpeed * sgn(dist));
  setRDrive(turningSpeed * sgn(dist) * -1);
  int error = dist - encoderGet(driveL);
  while(abs(error) > 0){
      if(abs(error) < 100){
        turningSpeed = 60;
      }
      setLDrive(turningSpeed * sgn(dist));
      setRDrive(turningSpeed * sgn(dist) * -1);
      error = dist - encoderGet(driveL);
  }
  setDrive(-20 * sgn(dist), 20 * sgn(dist));
  delay(150);
  setDrive(0, 0);
}
int sgn(int in){
  if(in > 0){
    return 1;
  }
  else if(in < 0){
    return -1;
  }
  else{
    return 0;
  }
}
void shootFlywheel(int speed){
/*  setIndexor(80);
  delay(500);
  setFlyWheel(speed);
  delay(250);
  slowDownFlywheel();*/
}
