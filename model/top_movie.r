library("ggplot2")
library("magrittr") #for %>%
library("dplyr")
library("formattable")
library("stats")
library("gridExtra")
library("htmlTable")
a<-read.csv("C:/Users/singh/Desktop/movie1.csv")
args<-commandArgs(TRUE)
n<-args[1]
top<-head(a,n,order(gross))
top_table=htmlTable(top,escape.html=FALSE)
write(file="top.html",top_table)
