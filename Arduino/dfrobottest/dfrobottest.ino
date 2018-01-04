int speedPin_M1 = 5;     //M1 Speed Control
int speedPin_M2 = 6;     //M2 Speed Control
int directionPin_M1 = 4;     //M1 Direction Control
int directionPin_M2 = 7;     //M1 Direction Control

void setup() {
  // put your setup code here, to run once:

}

void loop() {
  // put your main code here, to run repeatedly:
  carAdvance(100,100);
}
void carAdvance(int left,int right){
  analogWrite(speedPin_M2,-left);
    analogWrite(speedPin_M1,right);
   //digitalWrite(directionPin_M1,LOW);   
  //digitalWrite(directionPin_M2,LOW);   


}

