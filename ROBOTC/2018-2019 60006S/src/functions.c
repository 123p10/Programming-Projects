#include "main.h"
#include "fbc.h"
#include "fbc_pid.h"

/*
 OK for all declarations of motors USE THESE FUNCTIONS
 This is because motors cannot be reversed using pros so we must set them to negative in these functions
*/

void setLDrive(int speed){
  motorSet(LDT, -speed);
}
void setRDrive(int speed){
  motorSet(RDT, speed);
}
void setFlyWheel(int speed){
  motorSet(FWheelB, speed);
  motorSet(FWheelM, -speed);
  motorSet(FWheelS, -speed);
  motorSet(FWheelD, speed);

}
void setBallIntake(int speed){
  motorSet(BIntake,speed);
}
void setIndexor(int speed){
  motorSet(Indexor,speed);
}
void setDrive(int left,int right){
  setLDrive(left);
  setRDrive(right);
}
void setFlipper(int speed){
  motorSet(flipper,speed);
}
void slowDownFlywheel(){
  int timeDelay = 250;
  unsigned long time = millis();
  while(abs(motorGet(FWheelB)) >= 10){
    if(millis() - time >= (unsigned long)timeDelay){
      setFlyWheel(abs(motorGet(FWheelB)) - 10);
      time = millis();
    }
  }
}


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
void driveForward(int distance){
  const double kP = 0.5;
  encoderReset(driveL);
  encoderReset(driveR);
  int dL = distance - encoderGet(driveL);
  int dR = distance - encoderGet(driveR);
  int output = dL - dR;
  setLDrive(60);
  setRDrive(60-5);
  while(dL > 0){
    dL = distance - encoderGet(driveL);
    dR = distance - encoderGet(driveR);
    output = (encoderGet(driveL) - encoderGet(driveR)) * kP;
    setLDrive(60);
    setRDrive(motorGet(RDT) + output);
    delay(100);
  }

  setDrive(0, 0);
}
void flyWheelSpeed(int desiredRPM){

}
