import numpy as np
import cv2



def main():
    cap = cv2.VideoCapture('trimmed.mp4')
    fgbg = cv2.createBackgroundSubtractorMOG2()
    while(1):
        ret, frame = cap.read()

        fgmask = cv2.cvtColor(frame, cv2.COLOR_RGB2GRAY)

        cannyed_image = cv2.Canny(fgmask, 100, 200)

        cv2.imshow('frame',cannyed_image)
        k = cv2.waitKey(30) & 0xff
        if k == 27:
            break

    cap.release()
    cv2.destroyAllWindows()
if __name__ == "__main__":
    main()
