normalize = @(u) u/2 + 50;

[u1,u2] = meshgrid(-100:5:100);

u1norm = normalize(u1);
u2norm = normalize(u2);

mlgs = @(x) 1./(1+exp(-x)); % x = [-5; 5] хорошо выглядит
mlgsn = @(x) mlgs(x/10 - 5) * 100;

% mlgs2d = @(x, y) -mlgsn(0.9*sqrt((100-x).^2+(100-y).^2));
mlgs2d = @(x, y) mlgsn(min(x, y));


fit = mlgs2d(u1norm, u2norm);
surf(u1norm, u2norm, fit);