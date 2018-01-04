package main;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;

import javax.swing.JPanel;

import Objects.Box;
import Objects.Piece;
public class Game extends JPanel implements ActionListener, KeyListener{
	boolean isRunning = true;
	int bx = 8;
	int by = 8;
	int nPiece = 12;
	Box board[][] = new Box[bx][by];
	Piece pieces[] = new Piece[nPiece];
	Piece black[] = new Piece[nPiece];
	myMouseListener mml;
	Piece selected;
	public Game() {
		addKeyListener(this);
		setFocusable(true);
		setFocusTraversalKeysEnabled(false);
		init();
	}
	void init() {
		mml = new myMouseListener(this);
		this.addMouseListener(mml);
		
		for(int i = 0;i < bx;i++) {
			for(int j = 0;j < by;j++) {
				board[i][j] = new Box(i*Box.size,j*Box.size);
			}
		}
		pieces[0] = new Piece(board[0][0],0);
		pieces[1] = new Piece(board[1][0],1);
		pieces[2] = new Piece(board[4][4],1);
		pieces[3] = new Piece(board[5][5],1);

	}
	
	public void paint(Graphics g) {
		for(int i = 0;i < bx;i++) {
			for(int j = 0;j < by;j++) {
				if(board[i][j].getShade()) {
					g.setColor(Color.DARK_GRAY);
				}
				else {
					g.setColor(Color.LIGHT_GRAY);
				}
				g.fillRect(board[i][j].getX(), board[i][j].getY(), Box.size, Box.size);
				g.setColor(Color.BLACK);
				g.drawRect(board[i][j].getX(), board[i][j].getY(), Box.size, Box.size);

			}
		}
		for(int i = 0;i < pieces.length;i++) {
			if(pieces[i] != null) {
				if(pieces[i].getColor() == 0 && !pieces[i].isPressed()) {
					g.setColor(Color.red);
				}
				else if(pieces[i].getColor() == 0 && pieces[i].isPressed()){
					g.setColor(new Color(100,0,0));
				}
				else if(pieces[i].getColor() == 1 && pieces[i].isPressed()) {
					g.setColor(new Color(0,0,100));
				}
				else {
					g.setColor(new Color(0,0,255));
				}
				
				
				
				g.fillOval(pieces[i].getBox().getX(), pieces[i].getBox().getY(), Box.size, Box.size);
				
			}
		}
	}
	void update() {
		
	}
	
	
	public void mouseClicked(MouseEvent e) {
		boolean piece = false;
		for(int i = 0;i < pieces.length;i++) {
			if(pieces[i] != null) {
				if(e.getX() > pieces[i].getBox().getX() && e.getY() > pieces[i].getBox().getY() && e.getX() < pieces[i].getBox().getX() + Box.size && e.getY() < pieces[i].getBox().getY() + Box.size) {
					selected = pieces[i];
					
					for(int a = 0;a < pieces.length;a++) {
						if(pieces[a] != null) {
							if(pieces[a] != selected) {
								pieces[a].setPress(false);						
							}
						}
					}
					
					selected.setPress(true);
					pressAction();
					piece = true;
				}
			}
		}
		if(!piece) {
			for(int x = 0; x < bx;x++) {
				for(int y = 0; y < by;y++) {
					if(board[x][y].getShade()) {
						if(e.getX() > board[x][y].getX() && e.getY() > board[x][y].getY() && e.getX() < board[x][y].getX() + Box.size && e.getY() < board[x][y].getY() + Box.size) {
							int dx = Math.abs(selected.getBox().getX() - x);	
							int dy = Math.abs(selected.getBox().getY() - y);	

							
							selected.setBox(board[x][y]);
							selected = null;
							for(int ax = 0;ax < bx;ax++) {
								for(int ay = 0;ay < by;ay++) {		
									board[ax][ay].setShade(false);
								}
							}
						}
					}
				}
			}
		}
		
	}
	
	void pressAction() {
		int mx = 0,my = 0;
		//We need to find what index of the array my board is
		for(int x = 0;x < bx;x++) {
			for(int y = 0;y < by;y++) {
				if(selected.getBox() == board[x][y]) {
					mx = x;
					my = y;
				}
				board[x][y].setShade(false);
			}
		}
	//	board[mx][my+1].setShade(true);
		shadeAction(mx+1,my+1,1,1);
		shadeAction(mx-1,my-1,-1,-1);
		shadeAction(mx-1,my+1,-1,1);
		shadeAction(mx+1,my-1,1,-1);

	}
	void shadeAction(int x,int y,int dx,int dy) {
		if(x <= bx && y <= by && x >= 0 && y >= 0) {
			if(board[x][y] != null) {
				if(board[x][y].getPiece() == null) {
					board[x][y].setShade(true);
				}
				else {
					board[x + dx][y + dy].setShade(true);
//					System.out.println(board[x][y].getPiece().isPressed());

				}
			}
		}
	}
	
	
	@Override
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void keyPressed(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		// TODO Auto-generated method stub
		
	}

}
