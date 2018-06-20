#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <SoftwareSerial.h>
SoftwareSerial BT(2, 3); 
// If using software SPI (the default case):
#define OLED_MOSI   9
#define OLED_CLK   10
#define OLED_DC    11
#define OLED_CS    12
#define OLED_RESET 13
Adafruit_SSD1306 display(OLED_MOSI, OLED_CLK, OLED_DC, OLED_RESET, OLED_CS);

#define LOGO16_GLCD_HEIGHT 16
#define LOGO16_GLCD_WIDTH  16
#define SSD1306_LCDHEIGHT 64

int state = 0; //0 clock 1 notes

byte hour = 12;
byte minutes = 25;
byte seconds = 0;
int totalSec;
unsigned long previousMillis = 0;
unsigned long previousMin = 0;
unsigned long previousH = 0;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(19200);
  BT.begin(19200);
  BT.println("Hello from Arduino");
  // by default, we'll generate the high voltage from the 3.3v line internally! (neat!)
  display.begin(SSD1306_SWITCHCAPVCC);
  display.display();
  delay(1000);
  display.clearDisplay();
 
}
char a;
void loop() {
  getTime();
  //Serial.println(seconds);
  // put your main code here, to run repeatedly:
  if(state == 0){
    myClock();
  }
  if(BT.available()){
    char myString = new char[5];
    myString = BT.read();
     Serial.write(myString);
  }
  if (Serial.available())
  {
      BT.write(Serial.read());
  }
  

}
void myClock(){
  display.setTextColor(WHITE);
  display.setTextSize(1);
  display.setCursor(0,0);
  display.println("" + String(seconds));
  display.setTextSize(2);
  display.println("" + String(hour) + " : " + String(minutes));

  display.display();
  delay(200);
  display.clearDisplay();
}
void getTime(){
  unsigned long currentMs = millis();
  if(currentMs - previousMillis > 1000){
    previousMillis = currentMs;
    totalSec++;
    seconds++;
  }
  if(currentMs - previousMin > 60000){
    previousMin = currentMs;
    seconds = 0;
    minutes++;
  }
  if(currentMs - previousH > 3600000){
    previousH = currentMs;
    minutes = 0;
    hour++;
  }
  

}


