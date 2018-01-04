package Main;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.util.ArrayList;
import java.util.Random;

import javax.swing.JPanel;
import javax.swing.Timer;

import Objects.Block;
import Objects.Snake;

public class Game extends JPanel implements ActionListener, KeyListener{
	Timer time;
	int dt = 16;
	Snake snake;
	ArrayList<Block> blocks = new ArrayList<Block>();
	public Game() {
		// TODO Auto-generated method stub
		addKeyListener(this);
		setFocusable(true);
		setFocusTraversalKeysEnabled(false);
		time = new Timer(dt,this);
		time.start();
		init();
		
	}
	void init() {
		snake = new Snake(0,0,90);
		blocks.add(new Block(250,250,10,10));
	}
	@Override
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void keyPressed(KeyEvent e) {
		// TODO Auto-generated method stub
		if(e.getKeyCode() == e.VK_A) {
			snake.setDir(270);
		}
		else if(e.getKeyCode() == e.VK_W) {
			snake.setDir(0);
		}
		else if(e.getKeyCode() == e.VK_D) {
			snake.setDir(90);
		}
		else if(e.getKeyCode() == e.VK_S) {
			snake.setDir(180);
		}



	}
	public void paint(Graphics g) {
		g.setColor(Color.BLACK);
		g.fillRect(0,0,Main.DisplayW, Main.DisplayH);
		g.setColor(Color.YELLOW);
		for(int i = 0;i < snake.xPos.size();i++) {
			g.fillRect(snake.xPos.get(i), snake.yPos.get(i), snake.getSize(), snake.getSize());
		}
		for(int i = 0;i < blocks.size();i++) {
			g.fillRect(blocks.get(i).getX(), blocks.get(i).getY(), blocks.get(i).getW(), blocks.get(i).getH());
		}
		g.setFont(new Font("TimesRoman", Font.PLAIN, 25)); 
		g.drawString(Integer.toString(snake.lives), 100, 100);
	}


	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		// TODO Auto-generated method stub
		time.start();
		repaint();
		snake.update();
		for(int i = 0;i < snake.xPos.size();i++) {
			if(blocks.size() > 0) {
				for(int a = 0; a < blocks.size();a++) {
					int sX = snake.xPos.get(i);
					int sY = snake.yPos.get(i);
					int sS = snake.getSize();
					int bX = blocks.get(a).getX();
					int bY = blocks.get(a).getY();
					int bW = blocks.get(a).getW();
					int bH = blocks.get(a).getH();
					//From the left
					if(bX + bW > sX && bX < sX + sS && bY + bH > sY && bY < sY + sS){
						blocks.remove(a);
						snake.setLength(snake.getLength() + 10);
						randomBlock();
						//randomBlock();
						//randomBlock();
					}
				}
			}
		}
	}
	
	
	//UserFunctions
	void randomBlock() {
		int rX;
		int rY;
		Random rand = new Random();
		rX = rand.nextInt(450);
		rY = rand.nextInt(450);
		rX += 20;
		rY += 20;
		blocks.add(new Block(rX,rY,10,10));
	}
}
