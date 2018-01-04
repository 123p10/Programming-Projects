#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <math.h>

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

byte month = 1;
byte day = 1;
byte week = 1;
byte AmPm = 0;
byte hour = 0;
byte minutes = 0;
byte seconds = 0;
int totalSec;
unsigned long previousMillis = 0;
unsigned long previousMin = 0;
unsigned long previousH = 0;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);

  // by default, we'll generate the high voltage from the 3.3v line internally! (neat!)
  display.begin(SSD1306_SWITCHCAPVCC);
  display.display();
  delay(2000);
  display.clearDisplay();

}

void loop() {
  getTime();
  //Serial.println(seconds);
  // put your main code here, to run repeatedly:
  if(state == 0){
    myClock();
  }

}
void myClock(){
  display.setTextColor(WHITE);
  display.setTextSize(1);
  display.setCursor(display.width()/2,0);
  display.println("" + String(hour));
  display.setTextSize(4);
  display.setCursor(display.width()/2 + 7,display.height()/2 - 15);
  display.println(""  + String(seconds));
  display.setCursor(display.width()/2 - 15,display.height()/2 - 20);
  display.setTextSize(6);
  display.println(":");
  display.setTextSize(4);
  display.setCursor(display.width()/2 - 30,display.height()/2 - 15);
  display.println(""  + String(minutes));
  display.display();
  delay(500);
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


