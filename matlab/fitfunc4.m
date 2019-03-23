[u1, u2] = meshgrid(-100:5:100);

pinrm = @(x) x*pi/200;
sinx = @(x) (sin(x)+1)/2;
fit = @(x, y) 100 * sinx(x) .* sinx(y);
figure(1);
surf(u1, u2, fit(pinrm(u1), pinrm(u2)));

fitx = @(x, y) 100 * (sin(pi/200*x)+1) .* (sin(pi/200*y)+1) / 4;
figure(2);
surf(u1, u2, fitx(u1, u2));