/** @file opcontrol.c
 * @brief File for operator control code
 *
 * This file should contain the user operatorControl() function and any functions related to it.
 *
 * Any copyright is dedicated to the Public Domain.
 * http://creativecommons.org/publicdomain/zero/1.0/
 *
 * PROS contains FreeRTOS (http://www.freertos.org) whose source code may be
 * obtained from http://sourceforge.net/projects/freertos/files/ or on request.
 */

#include "main.h"

/*
 * Runs the user operator control code. This function will be started in its own task with the
 * default priority and stack size whenever the robot is enabled via the Field Management System
 * or the VEX Competition Switch in the operator control mode. If the robot is disabled or
 * communications is lost, the operator control task will be stopped by the kernel. Re-enabling
 * the robot will restart the task, not resume it from where it left off.
 *
 * If no VEX Competition Switch or Field Management system is plugged in, the VEX Cortex will
 * run the operator control task. Be warned that this will also occur if the VEX Cortex is
 * tethered directly to a computer via the USB A to A cable without any VEX Joystick attached.
 *
 * Code running in this task can take almost any action, as the VEX Joystick is available and
 * the scheduler is operational. However, proper use of delay() or taskDelayUntil() is highly
 * recommended to give other tasks (including system tasks such as updating LCDs) time to run.
 *
 * This task should never exit; it should end with some kind of infinite loop, even if empty.
 */

 /*
 Joystick Axis
 1 = Right Stick Horizontal
 2 = Right Stick Vertical
 3 = Left Stick Vertical
 4 = Left Stick Horizontal
*/
void driveControl();
void flywheelControl();
void indexor();

int power,turn;
int deadzone = 15;
float multiplier = (4/4);
const int driveStyle = 0;
int lD,rD;
//0 = tank
//1 = arcade
bool auton = false;
void operatorControl() {
	while (1) {
		driveControl();
		flywheelControl();
		indexor();
		flipperControl();
	//	print("cmon");
	//	lcdSetText(uart1, 2, "Owen > Veer");
		delay(20);
	}
	while(1){
		if(auton == false && button(8,'U')){
			autonomous();
			auton = true;
		}
	}
}
void driveControl(){
	if(driveStyle == 0){
		if(abs(joystick(3)) > deadzone){
			lD = joystick(3);
		}
		else{
			lD = 0;
		}

		if(abs(joystick(2)) > deadzone){
			rD = joystick(2);
		}
		else{
			rD = 0;
		}
		setDrive(-lD, -rD);

	}
	if(driveStyle == 1){
		if(abs(joystick(3)) > deadzone){
			power = joystick(3) * multiplier;
		}
		else{
			power = 0;
		}

		if(abs(joystick(4)) > deadzone){
			turn = joystick(4) * multiplier;
		}
		else{
			turn = 0;
		}
		setDrive(power + turn, power - turn);
	}
}
void flywheelControl(){
	if(button(8,'U')){
		setFlyWheel(65);
	}
	if(button(8,'D')){
		slowDownFlywheel();
	}
}
void flipperControl(){
	if(button(7,'U')){
		setFlipper(100);
	}
	else if(button(7,'D')){
		setFlipper(-45);
	}
	else{
		setFlipper(0);
	}
}
void indexor(){
	if(button(6,'U')){
		setIndexor(80);
	}
	else if(button(6,'D')){
		setIndexor(0);
	}
	if(button(5,'U')){
		setBallIntake(127);
	}
	else if(button(5,'D')){
		setBallIntake(0);
	}

}
