library("ggplot2")
library("dplyr")
library("statsr")
library("gridExtra")
library("knitr")
args<-commandArgs(TRUE)
genres<-args[1]
duration<-as.numeric(args[2])
content_rating<-args[3]
director<-args[4]
a<-read.csv("C:/Users/singh/Desktop/movie1.csv")
director_facebook_likes<-as.numeric(subset(a,director_name==director)[1,5])
finalMod <- lm(imdb_score ~ genres + duration + content_rating +director_facebook_likes, a)
summary(finalMod)
anova(finalMod)
dataDG <- data.frame(genres, duration, content_rating,director_facebook_likes)
predDG <- predict(finalMod, dataDG, interval="predict")
predDG[1]
