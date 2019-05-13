#include <Servo.h>

Servo myservo;  // create servo object to control a servo
   
int potpin = 0;  // analog pin used to connect the potentiometer
int val;    // variable to read the value from the analog pin


void setup() {
  // put your setup code here, to run once:
  myservo.attach(9);  // attaches the servo on pin 9 to the servo object

}

void loop() {
    delay(1200);
    myservo.write(90);                  // sets the servo position according to the scaled value
    delay(1200);                           // waits for the servo to get there
    myservo.write(0);
    delay(1200);
}
