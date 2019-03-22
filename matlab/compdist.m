function dist = compdist(user1, user2)

l = length(user1);
diff = zeros(1, l);

for i = 1:l
    diff(i) = abs(user1(i) - user2(i));
end

% посчитать похожесть по каждой координате
% посчитать общую похожесть
dist = rand;
end