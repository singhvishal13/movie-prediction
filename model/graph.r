library("ggplot2")
args<-commandArgs(TRUE)
n<-args[1]
a<-read.csv("C:/Users/singh/Desktop/movie1.csv")
png(filename="temp.png",width=800,height=800)
ggplot(a, aes(title_year)) +  geom_bar() +
  labs(x = "Year movie was released", y = "Movie Count", title = "Histogram of Movie released") +
  theme(plot.title = element_text(hjust = 0.5))
dev.off()

