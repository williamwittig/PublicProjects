/*
Name: William Wittig
Date: 10/19/2021
File: Paddle.java
Description: This file creates the Paddle object
*/

import acm.program.GraphicsProgram;
import acm.graphics.*;
import java.awt.Color;

public class Paddle extends GCompound
{ 
   // Setting up the GRect object
   private GRect paddle;
   
   // Building the Paddle from a GRect object
   public Paddle(double width, double height)
   {
      // Setting up the paddle
      paddle = new GRect(width, height);
      paddle.setColor(Color.BLACK);
      paddle.setFilled(true);
      add(paddle, 0, 0);
   }
}
