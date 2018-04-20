import edu.princeton.cs.algs4.StdRandom;
import edu.princeton.cs.algs4.StdStats;
import edu.princeton.cs.algs4.WeightedQuickUnionUF;
import java.lang.IllegalArgumentException;

public class PercolationStats {
    private double[] x;

    public PercolationStats(int n, int trials) {
        this.x = new double[trials];

        for (int i = 0; i < this.x.length; i++) {
            double start = System.currentTimeMillis();
            new Percolation(n);
            double end = System.currentTimeMillis();
            this.x[i] = end - start;
        }
    }   // perform trials independent experiments on an n-by-n grid
    
    public double mean() {
        return StdStats.mean(this.x);
    }   // sample mean of percolation threshold
    public double stddev() {
        return StdStats.stddev(this.x);
    }   // sample standard deviation of percolation threshold
    public double confidenceLo() {
        double confidenceLevel = 1.96;
        double temp = confidenceLevel * Math.sqrt(this.stddev()) / Math.sqrt(this.x.length);
        return this.mean() - temp;
    }   // low  endpoint of 95% confidence interval
    public double confidenceHi() {
        double confidenceLevel = 1.96;
        double temp = confidenceLevel * Math.sqrt(this.stddev()) / Math.sqrt(this.x.length);
        return this.mean() + temp;
    }   // high endpoint of 95% confidence interval
 
    public static void main(String[] args) {
        PercolationStats percolationStats = new PercolationStats(Integer.parseInt(args[0]), Integer.parseInt(args[1]));
        System.out.println("mean                    = " + percolationStats.mean());
        System.out.println("stddev                  = " + percolationStats.stddev());
        System.out.println("95% confidence interval = [" + percolationStats.confidenceLo() + ", " + percolationStats.confidenceHi() + "]");
    }       // test client (described below)
}
