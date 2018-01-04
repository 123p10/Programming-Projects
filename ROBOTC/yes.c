#pragma config(Sensor, dgtl1,  Encoder1R,      sensorQuadEncoder)
#pragma config(Sensor, dgtl3,  Encoder1L,      sensorQuadEncoder)
#pragma config(Sensor, dgtl5,  Encoder2R,      sensorQuadEncoder)
#pragma config(Sensor, dgtl7,  Encoder2L,      sensorQuadEncoder)
#pragma config(Sensor, dgtl10, LiftSensor,     sensorRotation)
#pragma config(Sensor, dgtl12, HiltSensor,     sensorRotation)
#pragma config(Motor,  port1,           HiltMotorR,    tmotorVex393_HBridge, openLoop)
#pragma config(Motor,  port2,           R1,            tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port3,           R2,            tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port4,           LiftSideR,     tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port5,           LiftSideRB,    tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port6,           LiftSideLB,    tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port7,           LiftSideL,     tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port8,           L1,            tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port9,           L2,            tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port10,          HiltMotorL,    tmotorVex393_HBridge, openLoop, reversed)
#pragma platform(VEX2)
#pragma competitionControl(Competition)
#include "Vex_Competition_Includes.c"
/*
 ####### #     # ####### #     #    ######  ######     #    #    # #######
 #     # #  #  # #       ##    #    #     # #     #   # #   #   #  #
 #     # #  #  # #       # #   #    #     # #     #  #   #  #  #   #
 #     # #  #  # #####   #  #  #    ######  ######  #     # ###    #####
 #     # #  #  # #       #   # #    #     # #   #   ####### #  #   #
 #     # #  #  # #       #    ##    #     # #    #  #     # #   #  #
 #######  ## ##  ####### #     #    ######  #     # #     # #    # #######


*/
task debugStreamSensors();
void moveSide(int speed,int distance);
void moveForward(int speed,int distance);
void clawRotation(int speed, int pos);
void moveForwardBack(int speed, int distance);
void liftRotation(int speed, int pos);
void liftRotation(int speed);
void nikScheme();
void jeffScheme();


/*

Test PID Values
Test Autonomous
Nik has to practice

*/


void pre_auton()
{
	//Says when we go through these tasks stop them ones that we do not need
  bStopTasksBetweenModes = true;
}


task autonomous()
{
	//Our Autonomous will have to change and test all these values]
//	moveForward(50,30);
	moveForward(127,400);
	liftRotation(63, 180);
	clawRotation(127,100);
	moveForward(127,50);
	moveForward(-127,-100);
	moveSide(127, 100);
	moveForward(127,50);
}

task usercontrol()
{
//	startTask(autonomous);
	startTask(debugStreamSensors);
  while (true)
  {
  	//Call it here but commented out because it has a wait1Msec(500)
		//Our driver scheme for Nik
		nikScheme();
  }
}

task debugStreamSensors()
{
	while(true)
	{
	//Debug Streams basically sendss information on the sensors to computer
		writeDebugStreamLine("R1: %d, R2: %d, L1: %d, L2: %d, LiftSensor: %d, HiltSensor: %d",
		SensorValue[Encoder1R], SensorValue[Encoder2R], SensorValue[Encoder1L], SensorValue[Encoder2L],
		SensorValue[LiftSensor], SensorValue[HiltSensor]);
	//	wait1Msec(500);
	}
}


void clawRotation(int speed, int pos){
	while (SensorValue[LiftSensor] < pos)
	{
		motor[HiltMotorR] = speed;
		motor[HiltMotorL] = speed;
	}

	while (SensorValue[LiftSensor] > pos)
	{
		motor[HiltMotorR] = -speed;
		motor[HiltMotorL] = -speed;
	}
		motor[HiltMotorR] = 0;
		motor[HiltMotorL] = 0;
}

void liftRotation(int speed, int pos){
	while (SensorValue[LiftSensor] < pos)
	{
		motor[LiftSideL] = speed;
		motor[LiftSideLB] = speed;
		motor[LiftSideR] = speed;
		motor[LiftSideRB] = speed;
	}

	while (SensorValue[LiftSensor] > pos)
	{
		motor[LiftSideL] = -speed;
		motor[LiftSideLB] = -speed;
		motor[LiftSideR] = -speed;
		motor[LiftSideRB] = -speed;
	}

	motor[LiftSideL] = 0;
	motor[LiftSideLB] = 0;
	motor[LiftSideR] = 0;
	motor[LiftSideRB] = 0;
}

void liftRotation(int speed){
	 motor[LiftSideL] = speed;
	motor[LiftSideLB] = speed;
	motor[LiftSideR] = speed;
	motor[LiftSideRB] = speed;
}

void nikScheme()
{

	int liftsens = 0.5, liftDeadzone = 15, deadzone = 15, rotDeadzone = 40;
	int X1 = 0, X2 = 0, Y1 = 0;

	if(abs(vexRT[Ch3]) > deadzone /*&& abs(vexRT[Ch4]) < rotDeadzone*/)
	{
		//Strafe
		X2 = vexRT[Ch3];
	}
	if(abs(vexRT[Ch4]) > deadzone /*-&&abs(vexRT[Ch1]) < rotDeadzone*/)
	{
		//Move Forward or Back
		Y1 = vexRT[Ch4];
	}
	if(abs(vexRT[Ch1]) > deadzone /*&& abs(vexRT[Ch2]) > rotDeadzone*/)
	{
		//Rotate
		X1 = vexRT[Ch1];
	}

/*	if(abs(vexRT[Ch3]) > liftDeadzone)
	{
		//Lift
		liftRotation(vexRT[Ch3]);

	}*/

	if(vexRT[Btn6U]){
		motor[HiltMotorL] = 127;
		motor[HiltMotorR] = 127;
	}
	else if(vexRT[Btn6D]){
		motor[HiltMotorL] = -127;
		motor[HiltMotorR] = -127;
	}
	else{
		motor[HiltMotorL] = 0;
		motor[HiltMotorR] = 0;
	}


	if(vexRT[Btn5U]){
		motor[LiftSideL] = 127;
		motor[LiftSideLB] = 127;
		motor[LiftSideR] = 127;
		motor[LiftSideRB] = 127;

	}
	else if(vexRT[Btn5D]){
		motor[LiftSideL] = -127;
		motor[LiftSideLB] = -127;
		motor[LiftSideR] = -127;
		motor[LiftSideRB] = -127;
	}
	else{
		motor[LiftSideL] = 0;
		motor[LiftSideLB] = 0;
		motor[LiftSideR] = 0;
		motor[LiftSideRB] = 0;
	}
/*	if(vexRT[Btn7U]){
    clawRotation(127,200);
	}
	if(vexRT[Btn7D]){
    clawRotation(127,100);
	}
	if(vexRT[Btn7L]){
    clawRotation(127,50);
	}
	if(vexRT[Btn7R]){
    //clawRotation(127,0);
	startTask(autonomous);
	}
	if(vexRT[Btn8L]){
		//Rotate Lift
		liftRotation(127,50);
	}
	if(vexRT[Btn8R]){
		liftRotation(127,100);
	//Rotate Lifts
	}
	if(vexRT[Btn8U]){
		liftRotation(127,200);
	}*/
	//Y1 = Accelerate/Decelerate
	//X1 = Rotate in spot
	//X2 = Strafe
		motor[R1] = Y1 - X2 - X1;
		motor[R2] =  Y1 - X2 + X1;
		motor[L1] = Y1 + X2 + X1;
		motor[L2] =  Y1 + X2 - X1;

}

void jeffScheme(){

}

//Strafing Code NF

void moveSide(int speed, int distance)
{
	//Gear Ratios
	int avLeft = (SensorValue[Encoder1L] + -SensorValue[Encoder2L])/2;
	int avRight = (-SensorValue[Encoder1R] + SensorValue[Encoder2R])/2;

	//!!!!CHANGE THESE!!!!//
	int kP = 33;
	int kI = 45;
	int kD = 60;

	int error_prior = 0;
	int integral = 0;
	int iteration_time = 10;

	int bias = 0.5;

	motor[R1] = -speed;
	motor[L1] = speed;
	motor[R2] = speed;
	motor[L2] = -speed;

	while((avLeft + avRight)/2 < distance)
	{

		avLeft = (SensorValue[Encoder1L] + SensorValue[Encoder2L])/2;
		avRight = (SensorValue[Encoder1R] + SensorValue[Encoder2R])/2;

		int error = avRight - avLeft;
		integral = integral + (error * iteration_time);
	    int derivative = (error - error_prior) / iteration_time;
	    int output = kP*error + kI*integral + kD*derivative + bias;
	    error_prior = error;
	    sleep(iteration_time);

	    if(avRight > avLeft)
	    {
	    	motor[R1] = -output;
			motor[L1] = speed;
			motor[R2] = output;
			motor[L2] = -speed;
	    }
	    else
	    {
	    	motor[R1] = -speed;
			motor[L1] = output;
			motor[R2] = speed;
			motor[L2] = -output;
		}
	}
	motor[R1] = 0;
	motor[L1] = 0;
	motor[L2] = 0;
	motor[R2] = 0;
}




void moveForward(int speed, int distance)
{
	int avLeft = (SensorValue[Encoder1L] + SensorValue[Encoder2L])/2;
	int avRight = (SensorValue[Encoder1R] + SensorValue[Encoder2R])/2;

	int kP = 33;
	int kI = 45;
	int kD = 60;

	int error_prior = 0;
	int integral = 0;
	int iteration_time = 10;

	int bias = 0.5;

	motor[R1] = speed;
	motor[L1] = speed;
	motor[R2] = speed;
	motor[L2] = speed;

	while((avLeft + avRight)/2 < distance)
	{

		avLeft = (SensorValue[Encoder1L] + SensorValue[Encoder2L])/2;
		avRight = (SensorValue[Encoder1R] + SensorValue[Encoder2R])/2;

		int error = avRight - avLeft;
		integral = integral + (error * iteration_time);
    	int derivative = (error - error_prior) / iteration_time;
    	int output = kP*error + kI*integral + kD*derivative + bias;
    	error_prior = error;
    	sleep(iteration_time);

    	if(avRight > avLeft)
    	{
    		motor[R1] = output;
			motor[L1] = speed;
			motor[R2] = output;
			motor[L2] = speed;
    	}
    	else
    	{
    		motor[R1] = speed;
			motor[L1] = output;
			motor[R2] = speed;
			motor[L2] = output;
		}
	}
	motor[R1] = 0;
	motor[L1] = 0;
	motor[L2] = 0;
	motor[R2] = 0;
}
