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
byte hourset = 12;
byte hour = 12;
byte minutes = 25;
byte minutesset = 25;
byte seconds = 0;
byte secondsset = 0;
int totalSec;
unsigned long previousMillis = 0;
unsigned long previousMin = 0;
unsigned long previousH = 0;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(19200);


  // by default, we'll generate the high voltage from the 3.3v line internally! (neat!)
  display.begin(SSD1306_SWITCHCAPVCC);
  display.display();
  delay(2000);
  display.clearDisplay();
   BT.begin(19200);
  BT.println("Hello from Arduino");
}
char a;
int hcount = 0;
int firsth =0 ;
int secondh = 0;
int thirdh = 0;
int fourthh = 0;
void loop() {
  getTime();
  if(state == 0){
    myClock();
  }
  if(BT.available()){
       a=(BT.read());
       Serial.print(a);
       if(a == 'H'){
          hcount = 1;
          return;
       }
       if(hcount == 4){
        fourthh = a - '0';
        hcount++;
        processTime(firsth,secondh,thirdh,fourthh);
        return;
       }
       if(hcount == 3){
        thirdh = a - '0';
        hcount++;
        return;
       }
       if(hcount == 2){
        secondh = a - '0';
        hcount++;
        return;
       }
       if(hcount == 1){
        firsth = a - '0';
        hcount++;
        return;
       }
  }

}

void processTime(int one,int two,int three,int four){
  hour = (one * 10) + (two * 1);
  minutes = (three * 10) + four;
  seconds = 0;
  hourset = hour;
  minutesset = minutes;
  secondsset = seconds;
  previousMillis = millis();
  previousMin = millis();
  previousH = millis();
}

void myClock(){
  display.setTextColor(WHITE);
  display.setTextSize(1);
  display.setCursor(0,0);
  display.println("" + String(seconds));
  display.setTextSize(2);
  if(hour < 10){
    display.print("0" + String(hour));
  }
  else{
    display.print("" + String(hour));
  }
  if(minutes >= 10){
    display.print(" : " + String(minutes));
  }
  else{
    display.print(" : 0" + String(minutes));
  }
  display.display();
  delay(500);
  display.clearDisplay();
}
unsigned long currentMs;
void getTime(){
  currentMs = millis();
  if(currentMs - previousMillis >= 1000){
    previousMillis = currentMs;
    totalSec++;
    seconds++;
  }
  if(seconds > 59){
    previousMin = currentMs;
    seconds = 0;
    minutes++;
  }
  if(minutes > 59){
    previousH = currentMs;
    minutes = 0;
    hour++;
  }
 
  

}


