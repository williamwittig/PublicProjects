/*
Name: William Wittig
Date: 10/19/2021
File: BreakoutGame.java
Description: This file constructs a game similar to the popular game 'Breakout'. The goal of the game is to bounce the ball
            off the paddle in order for the ball to hit the bricks, and to keep the ball above the paddle. After all the bricks
            are destroyed by the ball, the round is won and another level with be started where the ball will move slightly 
            faster, and there will be one more row of bricks to be destroyed. If the ball goes lower than the paddle, the round
            will be lost, and the high score will be set if the current round score is higher than the current high score and the
            player will be asked if they want to play another round.
*/

import acm.program.GraphicsProgram;
import acm.graphics.GObject;
import acm.graphics.GLabel;
import acm.graphics.GPoint;

import java.awt.Color;
import java.awt.event.MouseEvent;
import java.awt.event.KeyEvent;

public class BreakoutGame extends GraphicsProgram
{
   // ---------- Setting up variables to be used globally ----------
   final int APPLICATION_WIDTH = 800;
   final int APPLICATION_HEIGHT = 600;
   
   // Initial paddle variables
   Paddle paddle;
   double paddleWidth = 60;
   double paddleHeight = 10;
   double paddleX = 30;
   double paddleY = 30;
   
   // Initial brick variables
   double brickWidth = 60;
   double brickHeight = 20;
   double brickX = 30;
   double brickY = 30;
   int brickCount = 0;
   
   // Initial variables for ball movement
   Ball ball;
   boolean xDir = true;
   boolean yDir = true;
   int dX = 1;
   int dY = 1;
   
   // This object is used as a generic object to get the object that the ball collided with
   GObject collObj;
   
   // Initializing variables to keep track of the game progress
   int levelCount = 0;
   int skillLevel = 5;
   int roundScore = 0;
   int playerScore = 0;
   int highScore = 0;
   
   // Initializing labels
   GLabel levelLabel;
   GLabel highScoreLabel;
   GLabel scoreLabel;
   
   public static void main(String[] args)
   {
      BreakoutGame program = new BreakoutGame();
      program.start();
   }
   
   // ---------- Initializing ----------
   public void init()
   {
      setTitle("BREAKOUT!");
      setBackground(Color.WHITE);
      setSize(APPLICATION_WIDTH, APPLICATION_HEIGHT);
      
      // Setting up the welcome screen
      GLabel welcomeBanner = new GLabel("Welcome to BREAKOUT!");
      GLabel clickToContinue = new GLabel("Click anywhere to continue");
      GLabel byWilliamWittig = new GLabel("By: William Wittig");
      welcomeBanner.setFont("SansSerif-28");
      clickToContinue.setFont("SansSerif-14");
      byWilliamWittig.setFont("SansSerif-14");
      add(welcomeBanner, (APPLICATION_WIDTH / 2) - (welcomeBanner.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (welcomeBanner.getHeight() / 2));
      add(clickToContinue, (APPLICATION_WIDTH / 2) - (clickToContinue.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (welcomeBanner.getHeight() / 2) + (welcomeBanner.getHeight() + 10));
      add(byWilliamWittig, (APPLICATION_WIDTH / 2) - (byWilliamWittig.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (welcomeBanner.getHeight() / 2) + (welcomeBanner.getHeight() + 50));
      
      waitForClick();
      
      // Removing all welcome objects
      removeAll();
      
      // Adding listeners
      addKeyListeners();
      addMouseListeners();
   }
   
   // ---------- Run the game ----------
   public void run()
   {
      // The infinite loop for the game
      while(true)
      {
         setUpGame();
         pause(1000);
         
         // Infinite loop for ball movement
         while(true)
         {
            moveBall();
         }
      }
   }
   
   // Set up a new game
   public void setUpGame()
   {
      // Remove all to start with a clean slate
      removeAll();
      
      roundScore = 0;
      
      // Level cap of 10
      if(levelCount <= 10)
      {
         levelCount++;
      }
      
      // Labels on top of screen to show current score, high score, and current level
      scoreLabel = new GLabel("Score: " + playerScore);
      scoreLabel.setColor(Color.BLACK);
      scoreLabel.setFont("SansSerif-28");
      add(scoreLabel, 40, 50);
      
      highScoreLabel = new GLabel("High Score: " + highScore);
      highScoreLabel.setColor(Color.BLACK);
      highScoreLabel.setFont("SansSerif-28");
      add(highScoreLabel, (APPLICATION_WIDTH / 2) - (highScoreLabel.getWidth() / 2), 50);
      
      levelLabel = new GLabel("LEVEL: " + levelCount);
      levelLabel.setColor(Color.BLACK);
      levelLabel.setFont("SansSerif-28");
      add(levelLabel, APPLICATION_WIDTH - levelLabel.getWidth() - 40, 50);
   
      paddle = new Paddle(paddleWidth, paddleHeight);
      add(paddle, 350, 550);
      
      ball = new Ball(20);
      setUpBall();
      add(ball, 350, 400);
      
      populateBricks(1 + levelCount, 10);
   }
   
   // Ball setup
   public void setUpBall()
   {
      ball.setColor(Color.BLACK);
      ball.setFilled(true);
   }
   
   // Populating the screen with bricks
   public void populateBricks(int rows, int columns)
   {
      // Calculating to get even space on each side of the grid
      double space = (APPLICATION_WIDTH - (columns * 65)) / 2;
      
      Color colorArr[] = new Color[3];
      colorArr[0] = Color.GREEN;
      colorArr[1] = Color.BLUE;
      colorArr[2] = Color.RED;
      
      // Populating the screen with bricks
      for(int i = 0; i < rows; i++)
      {
         for(int j = 0; j < columns; j++)
         {
            Brick brick = new Brick(brickWidth, brickHeight);
            if(i % 2 == 0)
            {
               brick.setColor(colorArr[0]);
            }
            else if(i % 2 == 1)
            {
               brick.setColor(colorArr[1]);
            }
            if(i % 3 == 0)
            {
               brick.setColor(colorArr[2]);
            }
            
            brick.setFilled(true);
            add(brick, space + (j * 65), space + (i * 25));
         }
      }
      // Brick count to be used to compare against the score
      brickCount = rows * columns;
   }
   
   // Takes the position of the ball and keeps it inside the window
   public void moveBall()
   {
      // If all bricks are hit
      if(roundScore == brickCount)
      {
         removeAll();
         endGameW();
         
         waitForClick();
         run();
      }
      
      // Right bound of window
      if(ball.getX() >= APPLICATION_WIDTH - ball.getWidth())
      {
         xDir = false;
      }
      
      // Left bound of window
      else if(ball.getX() <= 0)
      {
         xDir = true;
      }
      
      // Upper bound of window
      if(ball.getY() <= 0)
      {
         yDir = true;
      }
      
      // Lower bound of window
      else if(ball.getY() >= APPLICATION_HEIGHT - ball.getHeight())
      {
         removeAll();
         endGameL();
         
         waitForClick();
         run();
      }
      
      // Move right
      if(xDir == true)
      {
         ball.move(dX, 0);
      }
      
      // Move left
      if(xDir == false)
      {
         ball.move(-dX, 0);
      }
      
      // Move up
      if(yDir == true)
      {
         ball.move(0, dY);
      }
      
      // Move down
      if(yDir == false)
      {
         ball.move(0, -dY);
      }
      
      // Getting the object that the ball collided with
      collObj = getCollisionObject();
      
      // If there is an object
      if(getCollisionObject() != null)
      {
         // If the object is the paddle
         if(collObj == paddle)
         {
            yDir = false;
         }
         
         // If the object was a brick
         if(collObj instanceof Brick)
         {
            // Top of brick deflection
            if(ball.getY() < collObj.getY())
            {
               yDir = false;
            }
            
            // Bottom of brick deflection
            if(ball.getY() > collObj.getY())
            {
               yDir = true;
            }
            
            // Left of brick deflection
            if(ball.getX() + (ball.getWidth() / 2) < collObj.getX())
            {
               xDir = false;
            }
            
            // Right of brick deflection
            if(ball.getX() + (ball.getWidth() / 2) > collObj.getX() + collObj.getWidth())
            {
               xDir = true;
            }
            
            // Remove the brick that was hit, incriment the player score, update the score
            remove(getCollisionObject());
            playerScore++;
            roundScore++;
            scoreLabel.setLabel("Score: " + playerScore);
         }
      }
      pause(skillLevel);
   }
   
   // Gets the object that the ball collided with
   public GObject getCollisionObject()
   {
      GPoint ballLoc = ball.getLocation();
      
      // Gets all corners of the ball bounds
      GPoint ballPoints[] = new GPoint[4];
      ballPoints[0] = new GPoint(0, 0);
      ballPoints[1] = new GPoint(0, ball.getWidth());
      ballPoints[2] = new GPoint(ball.getWidth(), ball.getWidth());
      ballPoints[3] = new GPoint(ball.getWidth(), 0);
      
      // Checks if an object collided with any of the corners
      for(int i = 0; i < 4; i++)
      {
         collObj = getElementAt(ballLoc.getX() + ballPoints[i].getX(), ballLoc.getY() + ballPoints[i].getY());
         if(collObj != null)
         {
            return collObj;
         }
      }   
      return null;   
   }
   
   // ---------- End of game instructions ----------
   // Sets up the game if the player wins
   public void endGameW()
   {
      removeAll();
      GLabel endGameLabel = new GLabel("You Won!");
      GLabel clickToContinue  = new GLabel("Click to continue.");
      endGameLabel.setFont("SansSerif-28");
      clickToContinue.setFont("SansSerif-14");
      add(endGameLabel, (APPLICATION_WIDTH / 2) - (endGameLabel.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (endGameLabel.getHeight() / 2));
      add(clickToContinue, (APPLICATION_WIDTH / 2) - (clickToContinue.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (endGameLabel.getHeight() / 2) + 40);
      
      if(skillLevel >= 1)
      {
         skillLevel-=0.25;
      }
   }
   
   // Sets up the game if the player loses
   public void endGameL()
   {
      removeAll();
      
      if(highScore < playerScore)
      {
         highScore = playerScore;
      }
      
      roundScore = 0;
      playerScore = 0;
      skillLevel = 5;
      levelCount = 0;
      
      GLabel endGameLabel = new GLabel("Game Over. Try Again?");
      GLabel clickToContinue  = new GLabel("Click to continue.");
      endGameLabel.setFont("SansSerif-28");
      clickToContinue.setFont("SansSerif-14");
      add(endGameLabel, (APPLICATION_WIDTH / 2) - (endGameLabel.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (endGameLabel.getHeight() / 2));
      add(clickToContinue, (APPLICATION_WIDTH / 2) - (clickToContinue.getWidth() / 2), (APPLICATION_HEIGHT / 2) - (endGameLabel.getHeight() / 2) + 40);
   }
   
   // ---------- Event Listeners ----------
   public void keyPressed(KeyEvent k)
   {
      // Left key moves paddle left
      int key = k.getKeyCode();
      
      if(key == KeyEvent.VK_LEFT)
      {
         paddle.move(-10, 0);
      }
      
      // Right key moves paddle right
      if (key == KeyEvent.VK_RIGHT)
      {
         paddle.move(10, 0);
      }
   }
   
   public void mouseMoved(MouseEvent e)
   {
      // Getting the mouse location
      double mouseX = e.getX();
      
      // If the paddle is visible try to move it, used to avoid moving a non-existing paddle
      if(this.paddle != null)
      {
         // If the mouse is to the left of the paddle move left
         if(mouseX < paddle.getX() + (paddle.getWidth() / 2))
         {
            paddle.move(-10, 0);
         }
         // If the mouse is to the right of the paddle move right
         if(mouseX > paddle.getX() + (paddle.getWidth() / 2))
         {
            paddle.move(10, 0);
         }
      }
   }
}