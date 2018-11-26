/** @file auto.c
 * @brief File for autonomous code
 *
 * This file should contain the user autonomous() function and any functions related to it.
 *
 * Any copyright is dedicated to the Public Domain.
 * http://creativecommons.org/publicdomain/zero/1.0/
 *
 * PROS contains FreeRTOS (http://www.freertos.org) whose source code may be
 * obtained from http://sourceforge.net/projects/freertos/files/ or on request.
 */

#include "main.h"

/*
 * Runs the user autonomous code. This function will be started in its own task with the default
 * priority and stack size whenever the robot is enabled via the Field Management System or the
 * VEX Competition Switch in the autonomous mode. If the robot is disabled or communications is
 * lost, the autonomous task will be stopped by the kernel. Re-enabling the robot will restart
 * the task, not re-start it from where it left off.
 *
 * Code running in the autonomous task cannot access information from the VEX Joystick. However,
 * the autonomous function can be invoked from another task if a VEX Competition Switch is not
 * available, and it can access joystick information if called in this way.
 *
 * The autonomous task may exit, unlike operatorControl() which should never exit. If it does
 * so, the robot will await a switch to another mode or disable/enable cycle.
 */

 //This File will be used for auton functions
 //Create a new file for each route

 //0.3 driveBackwards
 //0.2 driveForwards


void autonomous() {
  const int auton = 2;
  initSensors();
  if(auton == 0){
    setFlyWheel(127);
    delay(3000);
    setIndexor(127);
    delay(1250);
    setIndexor(0);
    driveBackward(cmToTicks(4),4000,0.3);
    turnEncoder(cmToTicks(-30));
    delay(500);
    driveBackward(cmToTicks(70),4000,0.3);
    delay(500);
    driveForward(cmToTicks(69),0.2);
    delay(500);
    turnEncoder(cmToTicks(28));
    delay(500);
    driveBackward(cmToTicks(23),4000,0.3);
    setIndexor(127);
    delay(1000);
    setIndexor(0);
  //  driveBackward(cmToTicks(25),4000,0.3);
    setDrive(-65,-100);
    delay(2000);
    setDrive(0,0);
  }
  if(auton == 1){
    setFlyWheel(127);
    delay(1000);
    driveBackward(cmToTicks(95), 10000,0.3);
    delay(1000);

    setFlyWheel(0);
    //driveForward(cmToTicks(5),0.2);
  /*  turnEncoder(cmToTicks(-125));
    setDrive(-127,-127);
    delay(3000);
    setDrive(0,0);*/
    //driveBackward(cmToTicks(40),10000,0.3);
  }
  if(auton == 2){
    setFlyWheel(127);
    delay(4000);
    setIndexor(127);
    delay(1250);
    setIndexor(0);
    driveBackward(cmToTicks(4),4000,0.3);
    turnEncoder(cmToTicks(31));
    delay(500);
    driveBackward(cmToTicks(70),4000,0.3);
    delay(500);
    driveForward(cmToTicks(71),0.2);
    delay(500);
    turnEncoder(cmToTicks(-33));
    delay(500);
    driveBackward(cmToTicks(33),4000,0.3);
    setIndexor(127);
    delay(1000);
    setIndexor(0);
  //  driveBackward(cmToTicks(25),4000,0.3);
    setDrive(-100,-75);
    delay(2000);
    setDrive(0,0);
  }
  //driveBackward(cmToTicks())
/*  setFlyWheel(80);
  driveForward(cmToTicks(10));
  driveBackward(cmToTicks(70),10000);
  setBallIntake(127);
  delay(100);
  //Shoot
  setIndexor(127);
  delay(850);
  setIndexor(0);
  delay(300);
  turnEncoder(cmToTicks(3));
  //Rape flag
  driveBackward(cmToTicks(50),1000);
  delay(400);
  //Pull out
  driveForward(cmToTicks(7));
  //Attempt to correct the turning
  turnEncoder(cmToTicks(-8));
  driveForward(cmToTicks(18));
  //Go for the cap
  turnEncoder(cmToTicks(-29));
  driveBackward(cmToTicks(40),10000);
  delay(200);
  setFlipper(-100);
  delay(900);
  setFlipper(0);
  driveForward(cmToTicks(30));
  delay(100);
  turnEncoder(cmToTicks(30));
  delay(100);

  driveForward(cmToTicks(105));
  delay(100);

  turnEncoder(cmToTicks(30));
  delay(100);

//Ram the platform
  setBallIntake(0);
  setDrive(127,127);
  delay(4000);
  setDrive(0,0);
  slowDownFlywheel();*/
}

void initSensors(){
  gyroReset(gyro);
  encoderReset(driveL);
  encoderReset(driveR);
  encoderReset(mogo);
}

void drive(int d,int speed){
  //Adjustables
  /*
  TBH Fuck Integral
  Just tune kP till its p good
  Then tune kD
  */
  float kP = 1;
  float kI = 0;
  float kD = 0;
  d = inchesToTicks(d);
  //Constant
  int previous_error = 0;
  int calc = 0;
  int integral = 0;
  int derivative = 0;
  int errorL = d - encoderGet(driveL);
  int errorR = d - encoderGet(driveR);
  int eD = (errorL + errorR)/2;
  int error = errorL - errorR;
  int left,right;


  if(d > 0){
    while(eD > 10){
      eD = (errorL + errorR)/2;
      error = errorL - errorR;

      integral += error;
      derivative = error - previous_error;
      previous_error = error;
      calc = error * kP + kI * integral + kD * derivative;

      left = speed + calc;
      right = speed - calc;
      setDrive(left,right);
      delay(50);
    }
  }
  else{
  }
}
