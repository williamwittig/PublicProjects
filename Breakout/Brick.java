/*
Name: William Wittig
Date: 10/19/2021
File: Brick.java
Description: This file creates the Brick object
*/

import acm.program.GraphicsProgram;
import acm.graphics.*;
import java.awt.Color;

public class Brick extends GCompound
{
   private GRect brick;
   
   // Building the brick from a GRect object
   public Brick(double width, double height)
   {
      brick = new GRect(width, height);
      add(brick);
   }
   
   // Adding the ability to fill in the Brick object
   public void setFilled(boolean bool)
   {
      brick.setFilled(true);
   }
}