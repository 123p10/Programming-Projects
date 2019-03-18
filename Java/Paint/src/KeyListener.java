import java.awt.Color;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;

import javax.swing.JColorChooser;

public class KeyListener extends KeyAdapter{
	Frame f;
	public static char keyPressed = '[';
	public boolean colorChosen = false;
	public KeyListener(Frame f) {
		this.f = f;
	}
	public void keyPressed(KeyEvent event) {
		synchronized(KeyListener.class) {
			char ch = event.getKeyChar();
			keyPressed = ch;
			if(ch == '+') {
				f.changeBrushSize(4);

			}
			if(ch == '-') {
				f.changeBrushSize(-4);
			}
			if(ch == 'c' && colorChosen == false) {
				colorChosen = true;
				Color newColor = JColorChooser.showDialog(f, "Choose a color", Color.RED);
				f.changeBrushColor(newColor);
				colorChosen = false;

			}

		}
	}
	public void keyReleased(KeyEvent event) {
		synchronized(KeyListener.class) {
			char ch = event.getKeyChar();
			if(ch == keyPressed) {
				keyPressed = '[';
			}
			if(ch == 'c') {
				colorChosen = false;
			}
		}
	}

	public static char keyPress() {
		synchronized(KeyListener.class) {
			return keyPressed;
		}
	}
}
