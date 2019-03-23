function distvec = compdist(user1, user2)

% normalize = @(u) u/2 + 50;
% 
% u1norm = normalize(user1);
% u2norm = normalize(user2);
% 
% mlgs = @(x) 1./(1+exp(-x));
% mlgsn = @(x) mlgs(x/10 - 5) * 100;
% mlgs2d = @(x, y) mlgsn(min(x, y));
% 
% distvec = mlgs2d(u1norm, u2norm);

logicsin = @(x, y) 100 * (sin(pi/200*x)+1) .* (sin(pi/200*y)+1) / 4;
distvec = logicsin(user1, user2);
end