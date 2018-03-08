package States;

import java.util.ArrayList;

import org.newdawn.slick.GameContainer;
import org.newdawn.slick.Graphics;
import org.newdawn.slick.SlickException;
import org.newdawn.slick.geom.ShapeRenderer;
import org.newdawn.slick.state.BasicGameState;
import org.newdawn.slick.state.StateBasedGame;

import Entities.Player;
import Main.Game;
import Objects.Bullet;
import Objects.Wall;
import javafx.scene.Camera;

public class Test extends BasicGameState {
	Player player;
	ArrayList<Wall> walls;
	ShapeRenderer s;

	@Override
	public void init(GameContainer arg0, StateBasedGame arg1) throws SlickException {
		// TODO Auto-generated method stub
		
		walls = new ArrayList<Wall>();
		//LEFT
		walls.add(new Wall(0,0,25,Game.V_HEIGHT,270));
		//TOP
		walls.add(new Wall(0,0,Game.V_WIDTH,25,0));
		//RIGHT
		walls.add(new Wall(Game.V_WIDTH,0,25,Game.V_HEIGHT,90));
		//BOTTOM
		walls.add(new Wall(0,Game.V_HEIGHT,Game.V_WIDTH,25,180));

		player = new Player(300,500,30,30,walls);
		s = new ShapeRenderer();
	}

	@Override
	public void render(GameContainer arg0, StateBasedGame arg1, Graphics g) throws SlickException {
		// TODO Auto-generated method stub
		g.translate(-player.getX() + (Game.V_WIDTH/2), -player.getY() + (Game.V_HEIGHT/2));
		s.fill(player.getShape());
		for(int i = 0;i < walls.size();i++) {
			s.fill(walls.get(i).getShape());
		}
		for(int i = 0;i < player.getBullets().size();i++) {
			s.fill(player.getBullets().get(i).getShape());
		}
		//g.fillRect(player.getX()-(player.getW()/2), player.getY()-(player.getH()/2), player.getW(), player.getH());
	}

	@Override
	public void update(GameContainer gc, StateBasedGame sb, int arg2) throws SlickException {
		input(gc);
		updateEntity(sb);
		updateProjectiles();
	}
	void input(GameContainer gc) {
		//Movement
		if(gc.getInput().isKeyDown(gc.getInput().KEY_A)) {
			player.moveLeft();
		}
		else if(gc.getInput().isKeyDown(gc.getInput().KEY_D)) {
			player.moveRight();
		}
		else {
			player.setvX(0);
		}
		if(gc.getInput().isKeyDown(gc.getInput().KEY_W)) {
			player.moveUp();
		}
		else if(gc.getInput().isKeyDown(gc.getInput().KEY_S)) {
			player.moveDown();
		}
		else {
			player.setvY(0);
		}
		//Shooting
		if(gc.getInput().isMouseButtonDown(gc.getInput().MOUSE_LEFT_BUTTON)) {
			player.shoot(gc,0);
		}
		System.out.println("X: " + gc.getInput().getMouseX() + " Y: " + gc.getInput().getMouseY());
	}
	void updateProjectiles() {
		for(int i = 0; i < player.getBullets().size();i++) {
			player.getBullets().get(i).update();
		}
	}
	void updateEntity(StateBasedGame sb) {
		player.update();
	}
	@Override
	public int getID() {
		// TODO Auto-generated method stub
		return Game.TEST;
	}
	

}
