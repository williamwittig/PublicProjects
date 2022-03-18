/*
Name: William Wittig
Date: 10/19/2021
File: Ball.java
Description: This file creates the Ball object
*/

import acm.program.GraphicsProgram;
import acm.graphics.*;
import java.awt.Color;

public class Ball extends GCompound
{
   private GOval ball;
   
   // Building a ball from a GOval object
   public Ball(double diameter)
   {
      ball = new GOval(diameter, diameter);
      add(ball);
   }

   // Adding the ability to fill in the Ball object   
   public void setFilled(boolean bool)
   {
      ball.setFilled(true);
   }
}