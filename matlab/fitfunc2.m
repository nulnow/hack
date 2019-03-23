normalize = @(u) u/2 + 50;

[u1,u2] = meshgrid(-100:5:100);

% u1norm = normalize(u1);
% u2norm = normalize(u2);

% mlgs = @(x) sin(x); % x = [-5; 5] хорошо выглядит
% lsin = @(x) sin(pi/100*(x - 50)) * 50 + 50;

% mlgs2d = @(x, y) -mlgsn(0.9*sqrt((100-x).^2+(100-y).^2));
% mlgs2d = @(x, y) lsin(min(x, y));

logicsin = @(u1, u2) 50 * sin(pi*min(u1, u2)/200)+50;


fit = logicsin(u1, u2);
surf(u1norm, u2norm, fit);