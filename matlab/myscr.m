clear;
clc;

n = 10; % кол-во пользователей
k = 3; % размерность пользователя
treshold = 70;

users = rand(n,k) .* 200 - 100;

distvec = zeros(n, n, k);

% вычисление векторов схожести
for i = 1:n-1
    for j = i+1:n
        distvec(i, j, :) = compdist(users(i,:), users(j,:));
        distvec(j, i, :) = distvec(i, j, :);
    end
end

% поиск максимумов векторов схожести
pairs = [];
for i = 1:n-1
    for j = i+1:n
        for e = 1:k
            if distvec(i, j, e) > treshold
                pairs = [pairs; i j e distvec(i, j, e)];
            end
        end
    end
end

% поверхности схожести
x = 1:n;
figure(1);
surf(x, x, distvec(:, :, 1));
figure(2);
surf(x, x, distvec(:, :, 2));
figure(3);
surf(x, x, distvec(:, :, 3));

% предпочтения пользователей u1, u2...
y = 1:k;
u1 = 1;
u2 = 2;
figure(4);
% plot(y, users(u1,:), y, users(u2, :));
hold off;
plot(y, users(u1,:), 'DisplayName', 'user1');
hold on;
plot(y, users(u2,:), 'DisplayName', 'user2');
legend;
axis([1,k,-100,100]);
grid on;

% ... и их вектор схожести
figure(5);
trvec = ones(1, k) * treshold;
% plot(y, squeeze(distvec(u1, u2, :)), y, trvec);
hold off;
plot(y, squeeze(distvec(u1, u2, :)), 'DisplayName', 'distvec');
hold on;
plot(y, trvec, 'DisplayName', 'treshold');
legend;
axis([1,k,0,100]);
grid on;