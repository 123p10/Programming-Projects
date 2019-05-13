#include <Servo.h>
Servo steeringServo; 
Servo throttleServo;
int throttleMax = 1673;
int throttleAvg = 1500;
int throttleMin = 1270;
int steeringMax = 2075;
int steeringAvg = 1500;
int steeringMin = 900;

 
int throttlePin; // Here's where we'll keep our channel values
int steeringPin;

void setup() {

  pinMode(5, INPUT); // Set our input pins as such
  pinMode(6, INPUT);
  steeringServo.attach (9,1000,2000);
  throttleServo.attach(10);
  Serial.begin(9600); // Pour a bowl of Serial

}

void loop() {

  throttlePin = pulseIn(5, HIGH,  250000); // Read the pulse width of 
  steeringPin = pulseIn(6, HIGH, 250000); // each channel

 /* Serial.print("Throttle: "); // Print the value of 
  Serial.println(throttlePin);        // each channel

  Serial.print("Steering: ");
  Serial.println(steeringPin);*/
  steeringFunc(steeringPin);
  throttleFunc(throttlePin);

  //delay(100); // I put this here just to make the terminal 
              // window happier
}
void throttleFunc(int throttle){
  if(throttle == 0){
    throttleServo.write(0);
    return;
  }
  int actual = throttle-throttleAvg;
  float ratio = (throttleMax - throttleAvg)/70;
  if(actual > 30){
    throttleServo.write(actual / ratio);
  }
  else{
    throttleServo.write(0);
  }
}
void steeringFunc(int steering){
  if(steering == 0){
    //ERROR UNPLUGGED WIRE
    steeringServo.write(90);
    return;
  }
  int actual = steering - steeringAvg;
  if(abs(actual) > 100){
    if(actual > 0){
        steeringServo.write(180);
    }
    else{
      steeringServo.write(0);
    }
  }
  else{
    steeringServo.write(90);
  }
}

