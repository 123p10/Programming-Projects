package States;

import org.newdawn.slick.GameContainer;
import org.newdawn.slick.SlickException;
import org.newdawn.slick.state.StateBasedGame;

import Entities.BasicEnemy;
import Entities.FastEnemy;
import Entities.Player;
import Main.Game;
import Objects.Wall;

public class Test extends GameState{
	public Test() {
		
	}
	public void init(GameContainer arg0, StateBasedGame arg1) throws SlickException {
		super.init(arg0, arg1);
		//LEFT
		walls.add(new Wall(0,0,25,Game.V_HEIGHT,270));
		//TOP
		walls.add(new Wall(0,0,Game.V_WIDTH,25,0));
		//RIGHT
		walls.add(new Wall(Game.V_WIDTH,0,25,Game.V_HEIGHT,90));
		//BOTTOM
		walls.add(new Wall(0,Game.V_HEIGHT,Game.V_WIDTH,25,180));
		//Basement for Testing pathfinding
		//walls.add(new Wall(0,Game.V_HEIGHT-200,Game.V_WIDTH-100,25,180));
		
		player = new Player(300,500,30,30,walls);
		enemies.add(new BasicEnemy(100,100,20,20,walls));
		enemies.add(new BasicEnemy(100,300,20,20,walls));
//		enemies.add(new FastEnemy(300,100,20,20,walls));

	}

}
