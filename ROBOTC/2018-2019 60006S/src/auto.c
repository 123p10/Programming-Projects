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

 //Constants for driving
 //0.75 is a good kP for both drive methods
 //turnEncoder(40) does approximately a 180

/*
New Auton Runs

1 red back tile left high flag, descore cap, platform attempt middle flag
*/
#define AUTON 2

void autonomous() {
  initSensors();
  TaskHandle anglerTask = taskRunLoop(anglerAuton, 25);
  TaskHandle puncherTask = taskRunLoop(puncherAuton, 25);
  initSensors();
  if(AUTON == 0){
  }
  if(AUTON == 1){
    setAnglerAutonHeight(2300);
    wait_for(700);
    autonShoot(360+80);
    wait_for(700);
    turnGyro(-90,1,5000);
    wait_for(300);
    setIntake(127);
    setAnglerAutonHeight(315);
    driveForward(cmToTicks(105),0.75,0,0);
    wait_for(1500);
    setIntake(0);
    driveBackward(cmToTicks(15), 0.8, 4000);
    wait_for(400);
    turnGyro(90,1,3000);
    wait_for(300);
    driveForward(cmToTicks(60),0.75,0,0);
    wait_for(500);
    setAnglerAutonHeight(1250);
    turnGyro(20,1,3000);
    wait_for(300);
    setIntake(127);
    wait_for(750);
    setIntake(0);
    wait_for(500);
    autonShoot(360*2+80);
    wait_for(1000);
  }
  if(AUTON == 2){
    setAnglerAutonHeight(2300);
    wait_for(700);
    autonShoot(360+80);
    wait_for(700);
    turnGyro(88,1,5000);
    wait_for(300);
    setIntake(127);
    setAnglerAutonHeight(315);
    driveForward(cmToTicks(90),0.75,0,0);
    wait_for(1500);
    setIntake(0);
    driveBackward(cmToTicks(15), 0.8, 4000);
    wait_for(400);
    turnGyro(-90,1,3000);
    wait_for(300);
    driveForward(cmToTicks(60),0.75,0,0);
    wait_for(500);
    setAnglerAutonHeight(1250);
    turnGyro(-20,1,3000);
    wait_for(300);
    setIntake(127);
    wait_for(750);
    setIntake(0);
    wait_for(500);
    autonShoot(360*2+80);
    wait_for(1000);

  }
  taskDelete(anglerTask);
  taskDelete(puncherTask);
}

void initSensors(){
  encoderReset(driveL);
  encoderReset(driveR);
  encoderReset(puncher);
//  gyroReset(gyro);
}




//Do not use this I left this here to help me think
