package Main;


import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.event.MouseEvent;
import java.util.ArrayList;

import javax.swing.JPanel;
import javax.swing.Timer;

import Maps.MapLoader;
import Objects.Ball;
import Objects.Block;
import Objects.Player;

public class Game extends JPanel implements ActionListener, KeyListener{
	int level = 1;
	boolean play = false;
	int lives = 3;
	boolean moveLeft = false;
	boolean moveRight = false;
	public static int ballSize = 10;
	private int score = 0;
	private Timer time;
	private int dt = 16;
	Player player;
    public static ArrayList<Ball> balls = new ArrayList();
    public static ArrayList<Block> blocks = new ArrayList();
    boolean canThrow = true;
    MapLoader mapper;
	public Game() {
		player = new Player(Main.DisplayW/2 - 75,Main.DisplayH - 100,75,10);
		mapper = new MapLoader();
		addKeyListener(this);
		setFocusable(true);
		setFocusTraversalKeysEnabled(false);
		addMouseListener(new MyMouseListener(this));

		time = new Timer(dt,this);
		time.start();
		newLevel();
		//Block block1 = new Block(250,250,20,20,1);
		//blocks.add(block1);
	}
	public void paint(Graphics g) {
		//bg
		g.setColor(Color.BLACK);
		g.fillRect(0, 0, Main.DisplayW, Main.DisplayH);
		
		//Player
		if(player != null) {
			g.setColor(Color.WHITE);
			g.fillRect(player.getX(), player.getY(), player.getW(), player.getH());
		}
		//Ball
		for(int i = 0;i < balls.size();i++) {
			if(balls.get(i) != null) {
				g.setColor(Color.YELLOW);
				g.fillOval((int)balls.get(i).getX(), (int)balls.get(i).getY(), (int)balls.get(i).getW(), (int)balls.get(i).getH());
			}
		}
		//Block
		for(int i = 0;i < blocks.size();i++) {
			if(blocks.get(i) != null) {
				if(blocks.get(i).getStr() == 1) {
					g.setColor(new Color(255,255,255));
				}
				if(blocks.get(i).getStr() == 2) {
					g.setColor(new Color(255,175,175));
				}
				if(blocks.get(i).getStr() == 3) {
					g.setColor(new Color(255,95,95));
				}
				if(blocks.get(i).getStr() == 4) {
					g.setColor(new Color(255,15,15));
				}


				g.fillRect(blocks.get(i).getX(), blocks.get(i).getY(), blocks.get(i).getW(), blocks.get(i).getH());
			}
		}
		//GUI
		g.setFont(new Font("TimesRoman", Font.PLAIN, 25)); 
		g.setColor(Color.WHITE);
		g.drawString(Integer.toString(lives), 10, 30);
		g.drawString(Integer.toString(score), Main.DisplayW - 40, 30);
		g.dispose();

	}
	
	
	
	@Override
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void keyPressed(KeyEvent e) {
		if(play) {
			//Move Left
			if(e.getKeyCode() == KeyEvent.VK_A) {
				moveLeft = true;
			}
			//Move Right
			else if(e.getKeyCode() == KeyEvent.VK_D) {
				//The 10 is just a buffer because regularly it is slightly off screen
				moveRight = true;
			}
			if(e.getKeyCode() == KeyEvent.VK_COMMA) {
				level++;
				newLevel();
			}
		}
		if(e.getKeyCode() == KeyEvent.VK_SPACE) {
			play = true;
		}

	}

	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
			if(e.getKeyCode() == KeyEvent.VK_A) {
			
				moveLeft = false;
			}
			else if(e.getKeyCode() == KeyEvent.VK_D) {
				moveRight = false;
			}
	}

	//
	
	//Basically our loop
	@Override
	public void actionPerformed(ActionEvent e) {
		if(play) {
			time.start();
			for(int i = 0;i < balls.size();i++) {
				//Move Ball with speed
				balls.get(i).setX(balls.get(i).getX() - balls.get(i).getVX());
				balls.get(i).setY(balls.get(i).getY() - balls.get(i).getVY());
			
				
				//Check if hit wall
				if(balls.get(i).getX() > Main.DisplayW - balls.get(i).getW()) {
					balls.get(i).deflectX();
				}
				else if(balls.get(i).getX() < 0 + balls.get(i).getW()/2) {
					balls.get(i).deflectX();
				}
				else if(balls.get(i).getY() < 0 + balls.get(i).getH()/2) {
					balls.get(i).deflectY();
				}
				
				//If is touching paddle
				if(balls.get(i).getX() >= player.getX() && balls.get(i).getX() <= player.getX() + player.getW()) {
					if(balls.get(i).getY() <= player.getY() + player.getH() && balls.get(i).getY() >= player.getY()) {
						balls.get(i).deflectY();
					}
				}
				for(int j = 0;j < blocks.size();j++) {
				if(balls.get(i).getX() >= blocks.get(j).getX() && balls.get(i).getX() <= blocks.get(j).getX() + blocks.get(j).getW()) {
					if(balls.get(i).getY() <= blocks.get(j).getY() + blocks.get(j).getH() && balls.get(i).getY() >= blocks.get(j).getY()) {
						if(balls.get(i).getY() <= blocks.get(j).getY() + blocks.get(j).getH()/2) {
							balls.get(i).deflectY();
						}
						if(balls.get(i).getY() >= blocks.get(j).getY() + blocks.get(j).getH()/2) {
							balls.get(i).deflectY();
						}
						if(balls.get(i).getX() <= blocks.get(j).getX() - blocks.get(j).getW()/2) {
							balls.get(i).deflectX();
						}
						if(balls.get(i).getX() >= blocks.get(j).getX() + blocks.get(j).getW()/2) {
							balls.get(i).deflectX();
						}
						blocks.get(j).setStr(blocks.get(j).getStr() - 1);
						if(blocks.get(j).getStr() == 0) {
							blocks.remove(j);
						}
						score++;
						if(score % 5 == 0) {
							balls.get(i).setVY(balls.get(i).getVX() + Integer.signum((int) balls.get(i).getVX()) * 2);
							balls.get(i).setVY(balls.get(i).getVY() + Integer.signum((int) balls.get(i).getVY()) * 2);
							System.out.println(balls.get(i).getVX());

						}
					}
				}
				}
				//KEEP THIS AT THE BOTTOM OR NULLPOINTER EXCEPTION
				//DO NOT PUT ANYTHING AFTER THIS
				if(balls.get(i).getY() > Main.DisplayH) {
					balls.remove(i);
					loseLife();
				}
				if(blocks.isEmpty()) {
					level++;
					newLevel();
				}
			}
			movePlayer();
		}
		repaint();
		

	}
	public void mousePressed(MouseEvent e) {
	/*	if(canThrow) {
			player.throwBall(e.getX(), e.getY());
		//d	canThrow = false;
		}*/
	}
	void movePlayer() {
		//Don't Move
		if(moveLeft == false && moveRight == false) {
			
		}
		//Left
		else if(moveLeft == true) {
			if(player.getX() > 0) {
				player.setX(player.getX() - 5);
			}
		}
		//Right
		else if(moveRight == true) {
			if(player.getX() < Main.DisplayW - player.getW() - 5) {
				player.setX(player.getX() + 5);
			}
		}
	}
	void loseLife() {
		lives--;
		if(lives <= 0) {
			lose();

		}
	}
	void lose() {
		Main.close();
		System.exit(0);
		System.out.println("dead");
	}
	void newLevel() {
		blocks.removeAll(blocks);
		player.setX(Main.DisplayW/2 - 75);
		player.setY(Main.DisplayH - 100);
		
		mapper.readLevel("Levels/Level" + level);
		balls.removeAll(balls);
		Ball initB = new Ball(250,250,ballSize,ballSize,-1,-3);
		balls.add(initB);
		

	}
}
