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
import Objects.Wall;

public class Test extends BasicGameState {
	Player player;
	ArrayList<Wall> walls;
	@Override
	public void init(GameContainer arg0, StateBasedGame arg1) throws SlickException {
		// TODO Auto-generated method stub
		
		walls = new ArrayList<Wall>();
		//LEFT
		walls.add(new Wall(0,0,1,Game.V_HEIGHT,270));
		//TOP
		walls.add(new Wall(0,0,Game.V_WIDTH,1,0));
		//RIGHT
		walls.add(new Wall(Game.V_WIDTH,0,1,Game.V_HEIGHT,90));
		//BOTTOM
		walls.add(new Wall(0,Game.V_HEIGHT,Game.V_WIDTH,1,180));

		player = new Player(300,500,30,30,walls);
	}

	@Override
	public void render(GameContainer arg0, StateBasedGame arg1, Graphics g) throws SlickException {
		// TODO Auto-generated method stub
		ShapeRenderer s = new ShapeRenderer();
		s.fill(player.getShape());
		//g.fillRect(player.getX()-(player.getW()/2), player.getY()-(player.getH()/2), player.getW(), player.getH());
	}

	@Override
	public void update(GameContainer gc, StateBasedGame sb, int arg2) throws SlickException {
		input(gc);
		updateEntity(sb);
	}
	void input(GameContainer gc) {
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
