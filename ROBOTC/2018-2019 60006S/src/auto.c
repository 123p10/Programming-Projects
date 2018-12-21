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
//driveForward 0.001


  //Negative is left
  //Positive is right

/*
New Auton Runs
  0 = red back auton, descore, flip cap, mount platform
  4 = blue back auton
  5 = red front auton
*/
void autonomous() {
//  TaskHandle flywheeltask = taskRunLoop(flyWheelSpeedManager,100);
  const int auton = 6;
  //flyWheelTargetSpeed = 0;
  initSensors();
  if(auton == 0){
    setFlyWheel(127);
    delay(200);
    driveForward(cmToTicks(150),0.001);
    delay(300);
    driveBackward(cmToTicks(3),5000,0.001);
    delay(300);
    turnEncoder(cmToTicks(-28));
    setFlyWheel(0);
    delay(500);
    driveBackward(cmToTicks(6), 1500, 0.001);
    delay(500);
    setLift(127);
    delay(600);
    setLift(-127);
    delay(300);
    setLift(0);
    turnEncoder(cmToTicks(-20));
    delay(300);
    driveForward(cmToTicks(4), 0.001);
    delay(300);
    turnEncoder(cmToTicks(20));
    delay(300);
    driveForward(cmToTicks(33),0.001);
    delay(300);
    setDrive(127,127);
    delay(900);
    setDrive(0,0);
  }
  else if(auton == 1){
    setFlyWheel(127);
    delay(1000);
    driveForward(cmToTicks(140),0.001);
    delay(300);
    driveBackward(cmToTicks(120), 5000, 0.001);
    delay(300);
    turnEncoder(cmToTicks(-28));
    delay(400);
    setIndexor(127);
    delay(600);
    setIndexor(0);
    delay(200);
    driveForward(cmToTicks(70),0.001);
    delay(200);
    setIndexor(127);
    delay(600);
    setIndexor(0);
    delay(200);
    driveBackward(cmToTicks(140),5000,0.001);
    turnEncoder(cmToTicks(20));
    driveForward(cmToTicks(30), 0.001);
  }
  else if(auton == 2){
    setFlyWheel(127);
    delay(200);
    driveForward(cmToTicks(150),0.001);
    delay(300);
    driveBackward(cmToTicks(3),5000,0.001);
    delay(300);
    setFlyWheel(0);
    turnEncoder(cmToTicks(-20));
    delay(300);
    driveForward(cmToTicks(7), 0.001);
    delay(300);
    turnEncoder(cmToTicks(20));
    delay(300);
    driveForward(cmToTicks(33),0.001);
    delay(300);
    setDrive(127,127);
    delay(900);
    setDrive(0,0);

  }
  else if(auton == 3){
    setFlyWheel(127);
    delay(500);
    driveForward(cmToTicks(130),0.001);
    delay(500);
    setFlyWheel(0);
  }
  else if(auton == 4){
    driveForward(cmToTicks(47),0.001);
    delay(500);
    turnEncoder(cmToTicks(-33));
    delay(500);
    driveForward(cmToTicks(30),0.001);
    delay(200);
    setLDrive(127);
    setRDrive(127);
    delay(1100);
    setDrive(0,0);

  }
  else if(auton == 5){
    setFlyWheel(127);
    delay(400);
    driveForward(cmToTicks(70),0.001);
    delay(800);
    setIndexor(127);
    delay(600);
    setIndexor(0);
    delay(200);
    turnEncoder(cmToTicks(-7));
    delay(300);
    driveBackward(cmToTicks(100),5000,0.001);
    setFlyWheel(0);
    delay(500);
    turnEncoder(cmToTicks(30));
    delay(500);
    driveForward(cmToTicks(20),0.001);
    delay(500);
    setDrive(127,127);
    delay(1000);
    setDrive(0,0);

  }
  else if(auton == 6){
      setFlyWheel(65);
      driveForward(cmToTicks(44),0.001);
      delay(1000);
      setIndexor(127);
      delay(1000);
      setIndexor(0);
      delay(500);
      turnEncoder(cmToTicks(-31));
      setFlyWheel(0);
      delay(500);
      driveForward(cmToTicks(30),0.001);
      delay(200);
      setLDrive(127);
      setRDrive(127);
      delay(1400);
      setDrive(0,0);

    }


}

void initSensors(){
  gyroReset(gyro);
  encoderReset(driveL);
  encoderReset(driveR);
  encoderReset(flyWheel);
}




//Do not use this I left this here to help me think
