library("ggplot2")
library("magrittr") #for %>%
library("dplyr")
library("formattable")
library("stats")
library("gridExtra")
library("htmlTable")
a<-read.csv("C:/Users/singh/Desktop/movie1.csv")
x<-a %>%
  group_by(director_name) %>%
  summarise(avg_imdb = mean(imdb_score)) %>%
  arrange(desc(avg_imdb)) %>%
  top_n(20, avg_imdb) %>%
  formattable(list(avg_imdb = color_bar("orange")), align = 'l')
table=htmlTable(x,escape.html=FALSE)
write(file="rating.html",table)

